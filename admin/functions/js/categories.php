<script>
	$(document).ready(function() {

		var table = $('#example').DataTable({
				responsive: true
			})
			.columns.adjust()
			.responsive.recalc();
      
	});

  //Show and Hide Add Modal
  function showAddModal(){
    $('.add-modal').removeClass('hidden');
    $('.add-modal-scroll').scrollTop(0);
    document.querySelector('.add-modal').reset();
  }

  $('.hide-add-modal').on('click', ()=>{
    $('.add-modal').addClass('hidden');
  })

  //Show and Hide Edit Modal
  function showEditModal(doc){
    $('.edit-modal').removeClass('hidden');
    $('.edit-modal-scroll').scrollTop(0);
    $('.edit-category-id').val(doc.getAttribute('data-id'));
    $('.edit-category').val(doc.getAttribute('data-category'));
  }

  $('.hide-edit-modal').on('click', ()=>{
    $('.edit-modal').addClass('hidden');
  })

  //Show and Hide Delete Modal
  function showDeleteModal(doc){
    $('.delete-modal').removeClass('hidden');
    $('.delete-customer-id').val(doc.getAttribute('data-id'));
    $('.delete-customer-profile').val(doc.getAttribute('data-profile'));
  }

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

  //Eye
  $('.eye').on('click',()=>{
        link = $('.eye')[0].src;
        
        if(link.includes('eye-slash')){
            $('.eye').attr('src', './../../..//img/icon/eye-solid.svg')
            $('.password').attr('type', 'text');
        }else{
            $('.eye').attr('src', './../../..//img/icon/eye-slash-solid.svg')
            $('.password').attr('type', 'password');
        }
    });
    $('.password').on('keyup', ()=>{
        if($('.password').val() != '')
            $('.eye').removeClass('hidden');
        else
            $('.eye').addClass('hidden');
    });
</script>





