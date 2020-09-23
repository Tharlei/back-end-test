<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreatedProduct extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The product instance.
     *
     * @var \App\Models\Product
     */
    protected $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->product->price = number_format(floatval($this->product->price), '2', ',', '.');

        return $this->from('robot@focusconcursos.com', 'Focus Concursos')
            ->subject('Produto criado')
            ->markdown('mails.created_product')
            ->with(['product' => $this->product]);
    }
}
