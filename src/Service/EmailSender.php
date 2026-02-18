<?

namespace App\Service;

use App\Event\EmailEvent;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class EmailSender
{
    public function __construct(
        private MailerInterface $mailer,
        private EventDispatcherInterface $eventDispatcher,
        private ContainerConfigurator $container
    ) {}

    public function send(
        string $template,
        array $context,
        string $to,
        string $subject,
        ?string $from = null
    ): void {
        $event = new EmailEvent($template, $context, $to, $subject, $from);
        $this->eventDispatcher->dispatch($event, EmailEvent::NAME);

        $email = (new TemplatedEmail())
            ->to($to)
            ->subject($subject)
            ->htmlTemplate($template)
            ->context($context);

        if (empty($from)) {
            $this->container->service()
                ->get('achieve_postman.mail')
                ->arg(0, $from);
        }
        $email->from($from);

        $this->mailer->send($email);
    }
}
