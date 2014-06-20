//Begin regex snippet
jQuery.expr[':'].regex = function(elem, index, match) {
    var matchParams = match[3].split(','),
        validLabels = /^(data|css):/,
        attr = {
            method: matchParams[0].match(validLabels) ? 
                        matchParams[0].split(':')[0] : 'attr',
            property: matchParams.shift().replace(validLabels,'')
        },
        regexFlags = 'ig',
        regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g,''), regexFlags);
    return regex.test(jQuery(elem)[attr.method](attr.property));
}
$('document').ready(function(){
    $(':regex(id,^clicky)').click(function(){
       $(this).parent('article').toggleClass('active');
       $(this).parent('article').toggleClass('hide');
       $(this).siblings('#hideme').toggleClass('hidden');
       $(this).siblings('#hideme').toggleClass('visible');
        
        });
});