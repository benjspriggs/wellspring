$(document).ready(function(){
    $('input:required').filter(function(){
        return !this.value;
    }).addClass('empty');
});