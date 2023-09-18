<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
require($fileDir . '/library/Autoloader.php');
		header('Content-type: text/javascript; charset=utf-8');
		header('Expires: Wed, 01 Jan 2020 00:00:00 GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s').'');
		header('Cache-Control: public');
/*echo"\n" . '$(document).ready(function() {'.
  "\n" . 'setTimeout(function() {'.
    "\n" . '$("#ctn-preloader").addClass("loaded");'.
    "\n" . '// Una vez haya terminado el preloader aparezca el scroll'.
    "\n" . '$("body").removeClass("no-scroll-y");'.
    "\n" . 'if ($("#ctn-preloader").hasClass("loaded")) {'.
      "\n" . '$("#preloader").delay('.$system['time_loading_start'].').queue(function() {'.
        "\n" . '$(this).remove();'.
      "\n" . '});'.
    "\n" . '}'.
  "\n" . '}, '.$system['time_loading_end'].'); '.
"\n" . '});';*/
?>

function showNotification(colorName, text) {
            if (colorName === null || colorName === '') { colorName = 'bg-black'; }
            if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
            var allowDismiss = true;
            $.notify({
                message: text
            },
            {
                type: colorName,
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 1000,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated fadeOutUp'
                },
                template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-40" : "") + '" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
        }
    	
 $(document).ready(function() {
        setTimeout(i, 2e3);
        function i() {
            $(".notify-box .listbox-content-item:first").each(function() {
                $(this).animate({
                    marginTop: -$(this).outerHeight(true),
                    opacity: "hide"
                }, 2e3, function() {
                    $(this).insertAfter(".notify-box .listbox-content-item:last"), $(this).fadeIn(), $(this).css({
                        marginTop: 0
                    }), setTimeout(function() {
                        i()
                    }, 2e3)
                })
            })
        }
		$('#panel_shop_toys').on( 'click', 'tr', function () {
                if ( $(this).hasClass('active') ) {
                    $(this).removeClass('active');
                    $("#btn-edit").fadeOut('slow');
                }else {
                    $('#panel_shop_toys').DataTable().$('tr.active').removeClass('active');
                    $(this).addClass('active');
                    $("#btn-edit").fadeOut('slow', function(){
                        $("#btn-edit").fadeIn('slow');
                    });
                    var data = $("#panel_shop_toys").DataTable().rows('.active').data();
                    var vnd = data[0][4].replace(',', '');
                    var tpl = '<div class="modal fade" id="edit-toys" tabindex="-1" role="dialog">\
                        <div class="modal-dialog" role="document">\
                            <div class="modal-content">\
                                <div class="modal-header">\
                                    <h4 class="modal-title">Chỉnh Sửa Toys '+data[0][2]+''+data[0][1]+'</h4>\
                                </div>\
                                <div class="modal-body">\
								<div class="row clearfix">\
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">\
                                            <label for="id-up">ID:</label>\
                                        </div>\
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">\
                                            <div class="form-group">\
                                                <div class="form-line">\
                                                    <input type="text"disabled id="id" class="form-control" value="'+data[0][0]+'">\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row clearfix">\
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">\
                                            <label for="id-up">Name:</label>\
                                        </div>\
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">\
                                            <div class="form-group">\
                                                <div class="form-line">\
                                                    <input type="text" id="name-toys" class="form-control" value="'+data[0][2]+'">\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row clearfix">\
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">\
                                            <label for="fbid-up">ID Toys</label>\
                                        </div>\
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">\
                                            <div class="form-group">\
                                                <div class="form-line">\
                                                    <input type="text" id="id-toys" class="form-control" value="'+data[0][3]+'">\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row clearfix">\
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">\
                                            <label for="name-up">Giá Tiền</label>\
                                        </div>\
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">\
                                            <div class="form-group">\
                                                <div class="form-line">\
                                                    <input type="text" id="price-toys" class="form-control" value="'+vnd+'">\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                <div class="modal-footer">\
                                    <div id="btn2"><button type="button" class="btn btn-green waves-effect" onclick="update_edit_toys()" data-click="reload"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa</button></div>\
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" data-click="reload"><i class="fa fa-times" aria-hidden="true"></i> Đóng</button>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
                    $("#show-modal").html(tpl);
                }
            })
		
    });
	function load_top_level(){
            $('#load_top_level').DataTable({
                destroy: true,
				responsive: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Charts-Level',
                "columns": [
					{
                        title: "ID"
                    },
                    {
                        title: "Tên nhân vật"
                    },
                    {
                        title: "Level"
                    },
                     {
                        title: "Trạng Thái"
                    },
                    
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function load_top_money(){
            $('#load_top_money').DataTable({
                destroy: true,
				responsive: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Charts-Money',
                "columns": [
                    {
                        title: "ID"
                    },
					{
                        title: "Tên nhân vật"
                    },
                    {
                        title: "Total Money"
                    },
                     {
                        title: "Trạng Thái"
                    },
                    
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function load_top_credits(){
            $('#load_top_credits').DataTable({
                destroy: true,
				responsive: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Charts-Credits',
                "columns": [
                    {
                        title: "ID"
                    },
					{
                        title: "Tên nhân vật"
                    },
                    {
                        title: "Total Credits"
                    },
                     {
                        title: "Trạng Thái"
                    },
                    
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function load_top_online(){
            $('#load_top_online').DataTable({
                destroy: true,
				responsive: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Charts-Online',
                "columns": [
                    {
                        title: "ID"
                    },
					{
                        title: "Tên nhân vật"
                    },
                    {
                        title: "Tổng giờ chơi"
                    },
                     {
                        title: "Trạng Thái"
                    },
                    
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function load_top_fame(){
            $('#load_top_fame').DataTable({
                destroy: true,
				responsive: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Charts-Fame',
                "columns": [
                    {
                        title: "ID"
                    },
					{
                        title: "Tên nhân vật"
                    },
                    {
                        title: "Danh Vọng"
                    },
                     {
                        title: "Trạng Thái"
                    },
                    
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function load_ds_vipham(){
            $('#load_ds_vipham').DataTable({
                destroy: true,
				responsive: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Statistical-Banned',
                "columns": [
                    {
                        title: "ID"
                    },
					{
                        title: "Tên nhân vật"
                    },
                    {
                        title: "Lý Do"
                    },
                     {
                        title: "Ngày Banned"
                    },
					{
                        title: "Ngày Unban"
                    },
					{
                        title: "Người Khóa"
                    },
                    
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
        function load_history_nap_the(){
            $('#load_history_nap_the').DataTable({
            	 sDom: 'lrtip',
                destroy: true,
				responsive: false,
				 bPaginate: false,
        bFilter: false,
        bInfo: false,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-History-Nap-The',
                "columns": [
					{
                        title: "#"
                    },
                    {
                        title: "Loại thẻ"
                    },
                    {
                        title: "Giá trị"
                    },
                     {
                        title: "Seri"
                    },
                    {
                        title: "Mã thẻ"
                    },
                    {
                        title: "Thời gian"
                    },
                    {
                        title: "Trạng thái"
                    },
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
        function load_history_nap_momo(){
            $('#load_history_nap_momo').DataTable({
            	sDom: 'lrtip',
                destroy: true,
				responsive: false,
				bPaginate: false,
				bFilter: false,
        		bInfo: false,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-History-Nap-MoMo',
                "columns": [
					{
                        title: "TransID"
                    },
                    {
                        title: "SDT Gửi Đi"
                    },
                    {
                        title: "Tên Chủ Ví"
                    },
                     {
                        title: "Mệnh Giá"
                    },
                    {
                        title: "Nội Dung"
                    },
                    {
                    	title: "Credit Nhận"
                    },
                    {
                        title: "Thời Gian"
                    },
                    
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function panel_list_reload(){
            $('#panel_list_reload').DataTable({
                destroy: true,
				responsive: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Panel-Reload',
                "columns": [
                    {
                        title: "ID"
                    },
					{
                        title: "Username"
                    },
                    {
                        title: "Loại Thẻ"
                    },
                     {
                        title: "Price"
                    },
					{
                        title: "Seri"
                    },
					{
                        title: "Mã Thẻ"
                    },
					{
                        title: "Tin Nhắn"
                    },
                    {
                        title: "Thời Gian"
                    },
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function panel_list_changename(){
            $('#panel_list_changename').DataTable({
                destroy: true,
				responsive: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Panel-Change-Name',
                "columns": [
                    {
                        title: "ID"
                    },
					{
                        title: "ID User"
                    },
                    {
                        title: "Tên Cũ"
                    },
                     {
                        title: "Tên Mới"
                    },
                    {
                        title: "Thời Gian"
                    },
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function panel_list_member(){
            $('#panel_list_member').DataTable({
                destroy: true,
				responsive: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Panel-Member',
                "columns": [
                    {
                        title: "ID"
                    },
					{
                        title: "User Name"
                    },
                    {
                        title: "IP"
                    },
                     {
                        title: "Hành Động"
                    }
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function panel_shop_toys(){
            $('#panel_shop_toys').DataTable({
                destroy: true,
				responsive: true,
				select: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Panel-ShopToys',
                "columns": [
					{
                        title: "ID"
                    },
                    {
                        title: "IMG"
                    },
					{
                        title: "Name Toys"
                    },
                    {
                        title: "ID Toys"
                    },
                     {
                        title: "Price"
                    },
                     {
                        title: "Trạng Thái"
                    }
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function panel_list_nap_momo(){
            $('#panel_list_nap_momo').DataTable({
            	sDom: 'lrtip',
                destroy: true,
				responsive: false,
				bPaginate: false,
				bFilter: false,
        		bInfo: false,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Panel-Nap-MoMo',
                "columns": [
                	{
                        title: "Username"
                    },
					{
                        title: "TransID"
                    },
                    {
                        title: "SDT Chuyển"
                    },
					{
                        title: "Tên người gửi"
                    },
                    {
                        title: "Số Tiền"
                    },
                    {
                        title: "Nội Dung"
                    },
                    {
                        title: "Thời Gian"
                    },
                    {
                        title: "Trạng Thái"
                    }
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function panel_list_nap_momo_2(){
            $('#panel_list_nap_momo_2').DataTable({
                sDom: 'lrtip',
                destroy: true,
				responsive: false,
				bPaginate: false,
				bFilter: false,
        		bInfo: false,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Panel-Nap-MoMo-2',
                "columns": [
					{
                        title: "Username"
                    },
					{
                        title: "TransID"
                    },
                    {
                        title: "SDT Chuyển"
                    },
					{
                        title: "Tên người gửi"
                    },
                    {
                        title: "Số Tiền"
                    },
                    {
                        title: "Nội Dung"
                    },
                    {
                        title: "Thời Gian"
                    },
                    {
                        title: "Trạng Thái"
                    }
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
        function panel_list_nap_momo_3(){
            $('#panel_list_nap_momo_3').DataTable({
                sDom: 'lrtip',
                destroy: true,
				responsive: false,
				bPaginate: false,
				bFilter: false,
        		bInfo: false,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Panel-Nap-MoMo-3',
                "columns": [
					{
                        title: "Username"
                    },
					{
                        title: "TransID"
                    },
                    {
                        title: "SDT Chuyển"
                    },
					{
                        title: "Tên người gửi"
                    },
                    {
                        title: "Số Tiền"
                    },
                    {
                        title: "Nội Dung"
                    },
                    {
                        title: "Thời Gian"
                    },
                    {
                        title: "Trạng Thái"
                    }
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		function panel_list_ipbans(){
            $('#panel_list_ipbans').DataTable({
                destroy: true,
				responsive: true,
				select: true,
                 "ajax": '/Auth/Ajax/Load.html?t=Load-Panel-IPBans',
                "columns": [
					{
                        title: "#"
                    },
					{
                        title: "IP"
                    },
					{
                        title: "Time"
                    },
					{
                        title: "Lý Do"
                    },
					{
                        title: "Admin Banned"
                    }
                ],
                "language": {
                    "search": "Tìm Kiếm",
                    "paginate": {
                        "first": "Về Đầu",
                        "last": "Về Cuối",
                        "next": "Tiến",
                        "previous": "Lùi"
                    },
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "emptyTable": "Không có gì để hiển thị",
                }
            });
        }
		