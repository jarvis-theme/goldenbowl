@if(!empty($mailing->action))
<div class="news-letter">
    <h1>NewsLetter</h1>
    <span>Dapatkan promo menarik dari toko kami segera!</span>
    <div class="tabs-mail">
        <img class="mail" src="//d3kamn3rg2loz7.cloudfront.net/assets/goldenbowl/assets/img/mail.png" alt="Email">
        <form action="{{@$mailing->action}}" method="post" class="subscribe">
            <div class="form">
                <input type="text" name="email" class="email" placeholder="Masukkan email anda" name="email" class="input-medium required email" id="newsletter mce-EMAIL" {{ @$mailing->action==''?'disabled="disabled"':'' }}>
            </div>
            <div class="btn">
                <button type="submit" class="btn-submit" {{ @$mailing->action==''?'disabled="disabled" style="opacity: 0.5; cursor: default;"':'' }}>Subscribe</button>
            </div>
        </form>
    </div>
</div>
@endif