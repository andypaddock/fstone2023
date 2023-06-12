<?php /*<div id="section-intro" class="nav-section section section__extranarrow introduction paragraph text-block"
                style="margin-top: 16rem;">


        <?php the_field('intro_copy');?>

        <p></p>

        <?php get_template_part('template-parts/seemore');?>

    </div>

 the above goes in page.php 

 */ ?>



<script>
window.onload = ()=>{


var target  = document.getElementById('target');
var expand  = document.getElementById('expand');
var seemore = document.getElementById('seemore');

console.log(target, expand, seemore);


var isExpanded = false;

target.remove_both_listeners = () => {
  
  target.clos && seemore.removeEventListener('click', target.clos);
  target.play && seemore.removeEventListener('click', target.play);
  
}  



var initial_anime_setup = () => {
  
    expand.initial = _.trimEnd(anime.get(target,'height','px'), 'px');
    console.log(expand.initial, '!');
    anime.set(expand, { height : expand.initial })
  
    target.anime2 = anime.timeline({
      easing: 'easeInOutBack',
      autoplay: false,
      duration: 1000,
      direction: 'normal',
      complete: () => {
        console.log('finished2');
        isExpanded = false;
        initial_anime_setup2();
      }                      
    });     
    target.anime2.add({
      targets: expand,
      height : '0'
    });
      target.remove_both_listeners();
      seemore.addEventListener('click', target.clos);
      seemore.textContent = "SEE LESS";
}
initial_anime_setup();
 
var initial_anime_setup2 = () => {
                  
  anime.set(expand, { height : 0 });

  target.anime1 = anime.timeline({
      easing: 'easeOutBack',
      duration: 1000,
      direction: 'forward',
      autoplay: false,
      complete: () => {
        console.log('finished1');
        isExpanded = true;
        initial_anime_setup();
      }
    });
  target.anime1
    .add({
    targets: expand,
    height: expand.initial
  })

    target.remove_both_listeners();
    seemore.addEventListener('click', target.play);
    seemore.textContent = "SEE MORE";
}
initial_anime_setup2();
  
target.play = () => { 
  
  target.remove_both_listeners();
  seemore.textContent = "SEE LESS";
  target.anime1.restart() 
}

target.clos = () => { 
  
  target.remove_both_listeners();
  target.anime2.restart() 
}


seemore.addEventListener('click', target.play);

window.addEventListener('resize', () => {
                          
  isExpanded ? initial_anime_setup() : initial_anime_setup2();
                          
});


}


</script>
<style>



#expand {
  
  overflow: hidden;
}

#target {
  margin : auto;
  text-align: center;

}

#target span{
  display : inline-block;
  margin : 0.6rem;
}

#seemore {
    text-align: center;
    cursor: pointer; 
}
</style>

<div id="expand">
   <div id="target">
     <?php the_field('intro_copy_more');?>
   </div>
</div>
<div id="seemore">SEE MORE</div>