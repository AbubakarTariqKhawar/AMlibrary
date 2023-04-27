
<template>


<div class="bookr">
  <div id="pagesrs" class="pagesrs my-5 ml-5">
    <div class="pagesr" > page1</div>
    <div class="pagesr" >page2</div>
    <div class="pagesr">page3</div>
    <div class="pagesr">page4</div>
    <div class="pagesr">page5</div>
    <div class="pagesr" >page6</div>
  </div>
</div>



</template>

<script>
export default {
    name: "ReadingInterface"
}
var pagesrs = document.getElementsByClassName('pagesr');
  for(var i = 0; i < pagesrs.length; i++)
    {
      var pagesr = pagesrs[i];
      if (i % 2 === 0)
        {
          pagesr.style.zIndex = (pagesrs.length - i);
        }
    }

  document.addEventListener('DOMContentLoaded', function(){
    for(var i = 0; i < pagesrs.length; i++)
      {
        //Or var pagesr = pagesrs[i];
        pagesrs[i].pagesrNum = i + 1;
        pagesrs[i].onclick=function()
          {
            if (this.pagesrNum % 2 === 0)
              {
                this.classList.remove('flipped');
                this.previousElementSibling.classList.remove('flipped');
              }
            else
              {
                this.classList.add('flipped');
                this.nextElementSibling.classList.add('flipped');
              }
           }
        }
  })
</script>

<style scoped>
*.bookr {
    transition: opacity 0.4s 0.2s;
  }
  p{
    margin-top: 8vw;
    text-align: center;
    font-size: 5vw;
    color: #000000;
  }
  .pagesr {
    width: 40vw;
    height: 55vw;
    float: left;
    margin-bottom: 0.5em;
    background: top no-repeat;
    background-size: cover;
  }
  .pagesr:nth-child(even) {
    clear: both;
  }
  .bookr {
    perspective: 250vw;
  }
  .bookr .pagesrs {
    width: 80vw;
    height: 55vw;
    position: relative;
    transform-style: preserve-3d;
    backface-visibility: hidden;
    border-radius: 4px;
  }
  .bookr .pagesr {
    float: none;
    clear: none;
    margin: 0;
    position: absolute;
    top: 0;
    width: 40vw;
    height: 55vw;
    transform-origin: 0 0;
    transition: transform 1.4s;
    backface-visibility: hidden;
    transform-style: preserve-3d;
    cursor: pointer;
    user-select: none;
    background-color: #f0f0f0;
  }
  .bookr .pagesr:before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    transition: background 0.7s;
    z-index: 2;
  }
  .bookr .pagesr:nth-child(odd) {
    pointer-events: all;
    transform: rotateY(0deg);
    right: 0;
    border-radius: 0 4px 4px 0;
  }
  .bookr .pagesr:nth-child(odd):hover {
    transform: rotateY(-15deg);
  }
  .bookr .pagesr:nth-child(odd):hover:before {
    background: rgba(0, 0, 0, 0.03);
  }
  .bookr .pagesr:nth-child(odd):before {
    background: rgba(0, 0, 0, 0);
  }
  .bookr .pagesr:nth-child(even) {
    pointer-events: none;
    transform: rotateY(180deg);
    transform-origin: 100% 0;
    left: 0;
    border-radius: 4px 0 0 4px;
    border-color: black;
  }
  .bookr .pagesr:nth-child(even):before {
    background: rgba(0, 0, 0, 0.2);
  }
  .bookr .pagesr.grabbing {
    transition: none;
  }
  .bookr .pagesr.flipped:nth-child(odd) {
    pointer-events: none;
    transform: rotateY(-180deg);
  }
  .bookr .pagesr.flipped:nth-child(odd):before {
    background: rgba(0, 0, 0, 0.2);
  }
  .bookr .pagesr.flipped:nth-child(even) {
    pointer-events: all;
    transform: rotateY(0deg);
  }
  .bookr .pagesr.flipped:nth-child(even):hover {
    transform: rotateY(15deg);
  }
  .bookr .pagesr.flipped:nth-child(even):hover:before {
    background: rgba(0, 0, 0, 0.03);
  }
  .bookr .pagesr.flipped:nth-child(even):before {
    background: rgba(0, 0, 0, 0);
  }
  *,
  * :before,
  *:after {
    box-sizing: border-box;
  }
  html,
  body {
    font-family: 'Lovers Quarrel', cursive;
    background: #333;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  }
  html {
    height: 100%;
  }
  body {
    min-height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2em 0;
    line-height: 1.5em;
  }
  .pagesr:nth-child(odd){
    background-position: right top;
  }
</style>
