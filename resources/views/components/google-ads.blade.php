@if($ads->isNotEmpty())
    @once
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            window.adsbygoogleProcessed = false;
        </script>
    @endonce

    @foreach($ads as $ad)
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="{{ $ad->ad_client }}"
             data-ad-slot="{{ $ad->ad_slot }}"
             data-ad-format="{{ $ad->ad_format }}"
             data-full-width-responsive="{{ $ad->full_width_response ? 'true' : 'false' }}">
        </ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    @endforeach
@endif