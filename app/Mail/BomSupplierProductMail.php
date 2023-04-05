<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class BomSupplierProductMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        // dd($bom_sup_pro);
        $this->details = $details;
      
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('KWinTechnologies Co.Ltd')
                    ->view('Email.bomsupplier_product_mail');
    }
}