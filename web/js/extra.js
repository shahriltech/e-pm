$(function(){
	 if($('#approval').hasClass('paperwork/approval')){
       $('li#submit').addClass('dropdown dropdown-fw active open selected');
    }
    if($('#paperworkajkView').hasClass('paperwork/view')){
       $('li#ajkPaperwork').addClass('active open selected');
    }
    if($('#paperworkajkcreate').hasClass('paperwork/create')){
       $('li#ajkPaperwork').addClass('active open selected');
    }
    if($('#paperworkUpdate').hasClass('paperwork/update')){
       $('li#ajkPaperwork').addClass('active open selected');
    }
    if($('#viewreport').hasClass('paperwork/viewreport')){
       $('li#report').addClass('dropdown dropdown-fw active open selected');
    }

    if($('#paperworkView').hasClass('paperwork/view')){
        $('li#submit').addClass('dropdown dropdown-fw active open selected');
       // $('li > a > span').addClass('open');
        $('li > ul > li#senaraikertas').addClass('active');
      }
    if($('#paperworkadminView').hasClass('paperwork/view')){
        $('li#senaraikertas').addClass('active open selected');
      }
    if($('#paperworkadminView').hasClass('paperwork/update')){
        $('li#senaraikertas').addClass('active open selected');
      }
    if($('#paperworkadmincreate').hasClass('userpwas/create')){
        $('li#submitpaper').addClass('active open selected');
      }  
     if($('#paperworkadminview').hasClass('userpwas/view')){
        $('li#submitpaper').addClass('active open selected');
      } 

    if($('#paperworkadminupdate').hasClass('userpwas/update')){
        $('li#submitpaper').addClass('active open selected');
      }
    $('#modalTidaklulus').click(function (){
  		jQuery('#tdaklulus').modal('show')
  		.find('#modalC')
  		.load($(this).attr('value'));
  	});

    $('#modallulus').click(function (){
      jQuery('#lulus').modal('show')
      .find('#modalD')
      .load($(this).attr('value'));
    });

    $(".date-picker").datepicker();
    $(".date-picke").datepicker({
      format: "yyyy", // Notice the Extra space at the beginning
    viewMode: "years", 
    minViewMode: "years"
    }); //date
    $(".year").datepicker({
      format: "yyyy", // Notice the Extra space at the beginning
    startView: "years", 
    minViewMode: "years",
    autoclose: true,

    }); //date
    $(".month").datepicker({
      format: "MM, yyyy", // Notice the Extra space at the beginning
      startView: "months", 
      minViewMode: "months",
      autoclose: true,
      language: 'ms'
    }); //date
    $(".week").datepicker({
      format: "yyyy-mm-dd", // Notice the Extra space at the beginning
     // startView: "months", 
     // minViewMode: "months",
      autoclose: true,
      language: 'ms'
    }); //date
    
    
});


