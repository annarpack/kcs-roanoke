/*!

 * @author Anna R Pack
 * @version 1.0
 */

 $(()=>{


$( window ).scroll(function() {
  const $doc = $(this).height();
  const $nav = $('nav.main-navigation');
    const $top = $(this).scrollTop();
    const $window = $(this);
      let $menu = $nav.position().top;
      const $header = ( $('header').height() - ($nav.height() * 2) );

  if($top > $header) {
     $('nav.main-navigation').css('position', 'fixed');
      $('nav.main-navigation').css('top', 0)
       $('nav.main-navigation').css('z-index', '1')
        $('nav.main-navigation').css('margin-top', 0)
  }
  else {

     $('nav.main-navigation').css('position', 'relative')
      $('nav.main-navigation').css('top', 0)
  }

});



const $ul_slides = $('ul.slides').each((num, element) => {
  const $slides = $(element).children('li').each((i, elm) => {
    //console.log('elm', elm)
    const $image = $(elm).children('img')[0];
    //console.log('image', $image)
    $($image).attr('data-id', i)
    if(i === 0) {
      $($image).addClass('showing')
    }
    else {
      $($image).hide()
    }
  })

})
const $thumbs = $('ul.slide-thumbs').each((num, element) => {
  $(element).children('li').each((i, elm) => {
    //console.log('elm', elm)
    const $image = $(elm).children('img')[0];
    $($image).attr('data-id', i);
  })
})

$('li.img-thumb').click(e => {
  console.log(e.currentTarget)
  let $image = $(e.currentTarget).children()[0];
  //console.log('image', $image)
  let id = $($image).attr('data-id');
  //console.log('id', id)
  let $slides =  $(e.currentTarget).parent('ul').parent().children()[0];
  //console.log('slides', $slides)
  let $showing = $($slides).children('li').find('.showing')
  //console.log('showing', $showing);
  $($showing).removeClass('showing').hide();

  let $show = $($slides).children('li')[id];
  let $show_img = $($show).children('img')[0]
  //console.log('show', $show_img)
  $($show_img).addClass('showing').show();
})



})
