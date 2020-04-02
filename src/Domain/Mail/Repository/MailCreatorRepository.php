<?php 
namespace App\Domain\Mail\Repository;
use PHPMailer\PHPMailer\PHPMailer;
use App\Domain\Mail\Data\MailCreateData;
/**
 * 
 */
class MailCreatorRepository
{
	/**
     * @var PDO The database connection
     */
    private $mail;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PHPMailer $mail)
    {
        $this->mail = $mail;        
    }

    public function sendMail(MailCreateData $mailData):bool
    {
        try {                    

            if (!empty( $mailData->getBody() )) {

            $this->mail->setFrom( $mailData->getFrom(), 'Site');
            $this->mail->addAddress( $mailData->getAddress() );// Add a recipient    
            // Content
            $this->mail->isHTML(true);// Set email format to HTML
            $this->mail->Subject = $mailData->getSubject();
            $this->mail->Body    = $mailData->getBody();
            $this->mail->AltBody = $mailData->getAltBody();

            $this->mail->send();
            return true;

            }else{
                return false;
            }

        } catch (Exception $e) {
            echo "erro ao enviar email";
        }

    }


}
?>