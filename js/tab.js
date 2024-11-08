const tabs = document.querySelectorAll('.tab-btn');
const contents = document.querySelectorAll('.tab-content .content');

tabs.forEach((tab, index) => {
  tab.addEventListener('click', (e) => {
   tabs.forEach((tab) => { tab.classList.remove('active'); })
   tab.classList.add('active');

   var line = document.querySelector('.line');
   line.style.left = tab.offsetLeft + 'px';
   line.style.width = tab.offsetWidth + 'px';

   contents.forEach((content) => { content.classList.remove('active'); })
   contents[index].classList.add('active');
 });
});