@component('layouts.components.show_two_column',['label'=>__('mail_message.id')]) @slot('field')
    {{$modelMailMessage->id}}
@endslot @endcomponent
@component('layouts.components.show_two_column',['label'=>__('mail_message.model_type')]) @slot('field')
    {{$modelMailMessage->module}}
@endslot @endcomponent
@component('layouts.components.show_two_column',['label'=>__('mail_message.mail_subject')]) @slot('field')
    {{$modelMailMessage->mail_subject}}
@endslot @endcomponent
@component('layouts.components.show_two_column',['label'=>__('mail_message.description')]) @slot('field')
    {{$modelMailMessage->mail_text}}
@endslot @endcomponent
@component('layouts.components.show_two_column',['label'=>'Previu']) @slot('field')
    Klik <a href='{{url('/mail_message/preview').'/'.$modelMailMessage->id}}'>Disini</a>
@endslot @endcomponent

