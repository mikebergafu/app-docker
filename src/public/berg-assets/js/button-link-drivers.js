
function bergLOG(tag,msg){
    console.log(tag,':',msg);
}
$(function () {
    $('#btn-admin-link').on('click', function () {
        window.location ='/admin/login';
        bergLOG('Admin Click', 'sdfds');
    });

    $('#btn-go-to-main-link').on('click', function () {
        window.location ='/';
        bergLOG('Admin Click', 'sdfds');
    });
});
