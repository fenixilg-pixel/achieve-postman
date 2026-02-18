<?

namespace App\EventListener;

use App\Event\EmailEvent;
use Psr\Log\LoggerInterface;

class EmailLoggerListener
{
    public function __construct(private LoggerInterface $logger) {}

    public function onEmailSend(EmailEvent $event): void
    {
        $this->logger->info(
            'Email sent',
            [
                'to' => $event->getTo(),
                'template' => $event->getTemplate(),
                'subject' => $event->getSubject()
            ]
        );
    }
}
