<span id="training_preview_{{ $userTraining->id }}"
  class="unselectable pointer-on-hover badge ProfileTextWrap TextWrapStyle"
  style="height:28px; margin-right: 20px"><span id="inner_training_preview{{ $userTraining->id }}"> {{ $userTraining->name }} </span> <div class="delete-badge-profil"
  onclick="removeTraining($('#'+this.id).parent().attr('id'))" onmouseleave="removeDeleteAnim(this.id)"
    onmouseenter="addDeleteAnim(this.id)" id="training_delete_preview{{ $userTraining->id }}">X</div></span>
