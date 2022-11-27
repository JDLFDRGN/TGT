<script>
	$(document).ready(function() {

		var table = $('#example').DataTable({
				responsive: true
			})
			.columns.adjust()
			.responsive.recalc();
      
	});

  $('.discount-checkbox').on('click', ()=>{
    if($('.discount-checkbox').is(':checked'))
      $('.discount-container').removeClass('hidden');
    else
      $('.discount-container').addClass('hidden');
  });

  //Show and Hide Add Modal
  function showAddModal(){
    $('.add-modal').removeClass('hidden');
    $('.add-modal-scroll').scrollTop(0);
    $('.discount-container').addClass('hidden');
    document.querySelector('.add-modal').reset();

    $('.product-container').removeClass('hidden');
    $('.product').addClass('hidden');
  }

  $('.hide-add-modal').on('click', ()=>{
    $('.add-modal').addClass('hidden');
  })

  //Show and Hide Edit Modal
  function showEditModal(doc){
    $('.product-container').addClass('hidden');
    $('.product').attr('src', './img/uploaded/' + doc.getAttribute('data-product'));
    $('.product').removeClass('hidden');
    
    $('.edit-modal').removeClass('hidden');
    $('.edit-modal-scroll').scrollTop(0);
    $('.edit-product-id').val(doc.getAttribute('data-id'));
    $('.edit-product').val(doc.getAttribute('data-product'));
    $('.edit-product-brand').val(doc.getAttribute('data-brand'));
    $('.edit-product-recent').val(doc.getAttribute('data-product'));
    $('.edit-product-category').val(doc.getAttribute('data-category-id')).change();
    $('.edit-product-description').val(doc.getAttribute('data-description'));
    $('.edit-product-quantity').val(doc.getAttribute('data-quantity'));
    $('.edit-product-price').val(doc.getAttribute('data-price'));
    $('.edit-product-password').val(doc.getAttribute('data-password'));

  }

  $('.hide-edit-modal').on('click', ()=>{
    $('.edit-modal').addClass('hidden');
  })

  //Show and Hide Delete Modal
  function showDeleteModal(doc){
    $('.delete-modal').removeClass('hidden');
    $('.delete-product-id').val(doc.getAttribute('data-id'));
    $('.delete-product').val(doc.getAttribute('data-product'));
  }

  $('.hide-delete-modal').on('click', ()=>{
    $('.delete-modal').addClass('hidden');
  })

  //Preview Image
  $('.image').change(function(){
        const file = this.files[0];
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            $('.product-container').addClass('hidden');
            $('.product').attr('src', event.target.result);
            $('.product').removeClass('hidden');
          }
          reader.readAsDataURL(file);
        }
    });
    $('.close-error-modal').on('click', ()=>{
        $('.error-modal').addClass('hidden');
    });
</script>
