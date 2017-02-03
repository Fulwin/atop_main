@if(session('msg'))
    <?php $flashMsg = session('msg'); ?>
    <div class="toast-msg hidden" data-message="{{ $flashMsg['content'] }}" data-type="{{ $flashMsg['status'] }}">
    </div>
@endif