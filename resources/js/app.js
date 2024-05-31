import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const clip = document.querySelectorAll(".clip");
for (let i = 0; i < clip.length; i++) {
  clip[i].addEventListener("mouseenter", function (e) {
    clip[i].setAttribute('controls', true)
    clip[i].play();
  });
  clip[i].addEventListener("mouseout", function (e) {
    clip[i].removeAttribute('controls')
    clip[i].pause();
  });
}


const video_overview_elem = document.getElementById('video_overview')
const video_overview_text_elem = document.getElementById('video_overview_text')
const close_video_orverview_btn = document.getElementById('close_video_overview_btn')
const show_more_phrase_elem = document.getElementById('show_more_phrase')

if (video_overview_elem) {
    video_overview_elem.addEventListener('click', () => {
        if (video_overview_elem.classList.contains('cursor-pointer')) {
            video_overview_text_elem.setAttribute('class', 'whitespace-pre')
            video_overview_elem.classList.remove('cursor-pointer')
            close_video_orverview_btn.classList.remove('hidden')
            show_more_phrase_elem.classList.add('hidden')
        }
    })

    close_video_orverview_btn.addEventListener('click', () => {
        video_overview_text_elem.setAttribute('class', 'w-1/4 truncate')
        video_overview_elem.classList.add('cursor-pointer')
        close_video_orverview_btn.classList.add('hidden')
            show_more_phrase_elem.classList.remove('hidden')
    })
}
