    // element Tags
    const tag= document.querySelector('html');
    const themeBtn=document.querySelector('.theme');
    const secNavTag=document.querySelector('.sec-nav');
    // init theme

    localStorage.getItem('theme')=='dark'? theme('dark'):theme('light');
    //btn event
    themeBtn.addEventListener('click',()=>{
       if(tag.getAttribute('data-bs-theme')==='dark'){
           theme('light');
           localStorage.setItem('theme','light');
       }else{
            theme('dark');
            localStorage.setItem('theme','dark');
       }
    })

     // init theme function
    function theme(mode) {
        if (mode==='dark') {
            tag.setAttribute('data-bs-theme','dark');
            secNavTag.classList.remove('bg-white');
            secNavTag.classList.add('bg-dark')
            themeBtn.innerHTML='<div class="btn btn-light"><i class="fa-solid me-1 fa-sun text-warning"></i></i> </div>'
        }else{
            tag.setAttribute('data-bs-theme','light');
            secNavTag.classList.remove('bg-dark');
            secNavTag.classList.add('bg-white');
            themeBtn.innerHTML='<div class="btn btn-dark"><i class="fa-solid fa-moon me-1"></i></div>'
        }
    }
// {/* <span  class="d-none d-md-inline">Dark Mode</span> */}
