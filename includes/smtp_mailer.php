<?php
/**
 * Simple SMTP Mailer Class
 * Sends emails using SMTP authentication
 */
class SMTPMailer {
    private $smtp_host;
    private $smtp_port;
    private $smtp_username;
    private $smtp_password;
    private $from_email;
    private $from_name;
    
    public function __construct($host, $port, $username, $password, $from_email, $from_name = '') {
        $this->smtp_host = $host;
        $this->smtp_port = $port;
        $this->smtp_username = $username;
        $this->smtp_password = $password;
        $this->from_email = $from_email;
        $this->from_name = $from_name ? $from_name : $from_email;
    }
    
    /**
     * Send email using SMTP
     */
    public function send($to, $subject, $message, $reply_to = '') {
        $socket = null;
        try {
            // Create SSL socket connection (port 465 uses SSL directly)
            $context = stream_context_create([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ]);
            
            $socket = @stream_socket_client(
                'ssl://' . $this->smtp_host . ':' . $this->smtp_port,
                $errno,
                $errstr,
                30,
                STREAM_CLIENT_CONNECT,
                $context
            );
            
            if (!$socket) {
                throw new Exception("Failed to connect to SMTP server: $errstr ($errno)");
            }
            
            // Set timeout
            stream_set_timeout($socket, 30);
            
            // Read server response
            $response = $this->getResponse($socket);
            if (substr($response, 0, 3) != '220') {
                throw new Exception("SMTP server error: $response");
            }
            
            // Send EHLO
            $this->sendCommand($socket, "EHLO " . $this->smtp_host);
            $response = $this->getResponse($socket);
            
            // Authenticate
            $this->sendCommand($socket, "AUTH LOGIN");
            $response = $this->getResponse($socket);
            if (substr($response, 0, 3) != '334') {
                throw new Exception("AUTH LOGIN failed: $response");
            }
            
            $this->sendCommand($socket, base64_encode($this->smtp_username));
            $response = $this->getResponse($socket);
            if (substr($response, 0, 3) != '334') {
                throw new Exception("Username authentication failed: $response");
            }
            
            $this->sendCommand($socket, base64_encode($this->smtp_password));
            $response = $this->getResponse($socket);
            if (substr($response, 0, 3) != '235') {
                throw new Exception("Password authentication failed: $response");
            }
            
            // Set sender
            $this->sendCommand($socket, "MAIL FROM: <" . $this->from_email . ">");
            $response = $this->getResponse($socket);
            if (substr($response, 0, 3) != '250') {
                throw new Exception("MAIL FROM failed: $response");
            }
            
            // Set recipient
            $this->sendCommand($socket, "RCPT TO: <" . $to . ">");
            $response = $this->getResponse($socket);
            if (substr($response, 0, 3) != '250') {
                throw new Exception("RCPT TO failed: $response");
            }
            
            // Send data
            $this->sendCommand($socket, "DATA");
            $response = $this->getResponse($socket);
            if (substr($response, 0, 3) != '354') {
                throw new Exception("DATA command failed: $response");
            }
            
            // Build email headers
            $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
            $headers .= "To: <" . $to . ">\r\n";
            if ($reply_to) {
                $headers .= "Reply-To: " . $reply_to . "\r\n";
            }
            $headers .= "Subject: " . $subject . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
            $headers .= "Date: " . date('r') . "\r\n";
            
            // Send email content
            $email_content = $headers . "\r\n" . $message . "\r\n.\r\n";
            fwrite($socket, $email_content);
            $response = $this->getResponse($socket);
            if (substr($response, 0, 3) != '250') {
                throw new Exception("Email sending failed: $response");
            }
            
            // Quit
            $this->sendCommand($socket, "QUIT");
            $this->getResponse($socket);
            fclose($socket);
            
            return true;
        } catch (Exception $e) {
            if ($socket && is_resource($socket)) {
                fclose($socket);
            }
            error_log("SMTP Error: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Send command to SMTP server
     */
    private function sendCommand($socket, $command) {
        fwrite($socket, $command . "\r\n");
    }
    
    /**
     * Get response from SMTP server
     */
    private function getResponse($socket) {
        $response = '';
        while ($line = fgets($socket, 515)) {
            $response .= $line;
            if (substr($line, 3, 1) == ' ') {
                break;
            }
        }
        return $response;
    }
}
?>

