<script>
	$(document).ready(function() {

		var table = $('#example').DataTable({
				responsive: true
			})
			.columns.adjust()
			.responsive.recalc();
      
	});

  //Show activate and deactivate modal
  function showActivateModal(doc){
    $('.activate-modal').removeClass('hidden');
    $('.activate-customer-id').val(doc.getAttribute('data-id'));
  }

  $('.hide-activate-modal').on('click',()=>{
    $('.activate-modal').addClass('hidden');
  })

  //Show and Hide Add Modal
  function showAddModal(){
    $('.add-modal').removeClass('hidden');
    $('.add-modal-scroll').scrollTop(0);
    document.querySelector('.add-modal').reset();

    $('.profile-container').removeClass('hidden');
    $('.profile').addClass('hidden');
  }

  $('.hide-add-modal').on('click', ()=>{
    $('.add-modal').addClass('hidden');
  })

  //Show and Hide Edit Modal
  function showEditModal(doc){
    $('.profile-container').addClass('hidden');
    $('.profile').attr('src', './../img/uploaded/' + doc.getAttribute('data-profile'));
    $('.profile').removeClass('hidden');

    $('.edit-modal').removeClass('hidden');
    $('.edit-modal-scroll').scrollTop(0);
    $('.edit-customer-id').val(doc.getAttribute('data-id'));
    $('.edit-customer-recent').val(doc.getAttribute('data-profile'));
    $('.edit-customer-email').val(doc.getAttribute('data-email'));
    $('.edit-customer-firstname').val(doc.getAttribute('data-firstname'));
    $('.edit-customer-lastname').val(doc.getAttribute('data-lastname'));
    $('.edit-customer-gender').val(doc.getAttribute('data-gender'));
    $('.edit-customer-birthdate').val(doc.getAttribute('data-birthdate'));
    $('.edit-customer-password').val(doc.getAttribute('data-password'));
  }

  $('.hide-edit-modal').on('click', ()=>{
    $('.edit-modal').addClass('hidden');
  })

  $('.close-error-modal').on('click', ()=>{
    $('.error-modal').addClass('hidden');
  });

  //Show and Hide Delete Modal
  // function showDeleteModal(doc){
  //   $('.delete-modal').removeClass('hidden');
  //   $('.delete-customer-id').val(doc.getAttribute('data-id'));
  //   $('.delete-customer-profile').val(doc.getAttribute('data-profile'));
  // }

  $('.hide-delete-modal').on('click', ()=>{
    $('.delete-modal').addClass('hidden');
  })

  //Preview Image
  $('.image').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('.profile-container').addClass('hidden');
            $('.profile').attr('src', event.target.result);
            $('.profile').removeClass('hidden');
          }
          reader.readAsDataURL(file);
        }
    });

    $('.show-change-password').on('click', ()=>{
        if($('.show-change-password').is(':checked')){
            $('.change-password-container').show();
            $('.password').attr('required', 'true');
        }else{
            $('.change-password-container').hide();
            $('.password').removeAttr('required');
        }
    })

    function passwordVisibility(doc){
        let password = doc.parentElement.querySelector('.password');

        if(doc.getAttribute('src').includes('eye-slash')){
            doc.setAttribute('src', './../img/icon/eye-solid.svg');
            password.type = 'text';
        }else{
            doc.setAttribute('src', './../img/icon/eye-slash-solid.svg');
            password.type = 'password';
        }
    }
    function eyeVisibility(doc){
        let eye = doc.parentElement.querySelector('.eye');
        if(doc.value != ''){
            eye.classList.remove('hidden');
        }else{
            eye.classList.add('hidden');
        }
    }
</script>





