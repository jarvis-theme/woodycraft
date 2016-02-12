<div id="newsletter_left" class="block">
    <div class="block-content">
        <h2>Newsletter</h2>
        <p>Dapatkan promo menarik dari toko kami segera!</p>
        <form action="{{@$mailing->action}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form newsletter" class="validate" target="_blank" novalidate>
            <input type="text" placeholder="Masukkan email anda" id="newsletter mce-EMAIL" name="email" required {{ @$mailing->action==''?'disabled="disabled" style="opacity: 0.5; cursor: default;"':'' }}>
            <button class="submit" type="submit" {{ @$mailing->action==''?'disabled="disabled" style="opacity: 0.5; cursor: default;"':'' }}><span>subscribe</span></button>
        </form>
    </div>
</div>