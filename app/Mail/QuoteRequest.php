<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Product;

class QuoteRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $form;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product, $form)
    {
        // 一旦通过此种方式被设置为公用属性, 那么即在 view 中可用
        $this->product = $product;
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('products.quote_request_email');
    }
}
