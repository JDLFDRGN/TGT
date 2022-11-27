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
    $('.edit-seasonal-id').val(doc.getAttribute('data-id'));
    $('.edit-seasonal-product').val(doc.getAttribute('data-product-id'));
    $('.edit-seasonal-percentage').val(doc.getAttribute('data-percentage'));
    $('.edit-seasonal-expiration').val(doc.getAttribute('data-expiration'));
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
</script>





