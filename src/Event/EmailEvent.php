<?

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class EmailEvent extends Event
{
    public const NAME = 'achieve_postman_email.send';

    private string $template;
    private array $context;
    private string $to;
    private string $subject;
    private ?string $from = null;

    public function __construct(
        string $template,
        array $context,
        string $to,
        string $subject,
        ?string $from = null
    ) {
        $this->template = $template;
        $this->context = $context;
        $this->to = $to;
        $this->subject = $subject;
        $this->from = $from;
    }

    public function getTemplate(): string { return $this->template; }
    public function getContext(): array { return $this->context; }
    public function getTo(): string { return $this->to; }
    public function getSubject(): string { return $this->subject; }
    public function getFrom(): ?string { return $this->from; }
}
