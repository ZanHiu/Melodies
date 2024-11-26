const tabs = document.querySelectorAll('.tab-btn');
const contents = document.querySelectorAll('.tab-content .content');

const setLinePosition = () => {
  const activeTab = document.querySelector('.tab-btn.active');
  if (activeTab) {
    var line = document.querySelector('.line');
    line.style.left = activeTab.offsetLeft + 'px';
    line.style.width = activeTab.offsetWidth + 'px';
  }
}

setLinePosition();

tabs.forEach((tab, index) => {
  tab.addEventListener('click', (e) => {
   tabs.forEach((tab) => { tab.classList.remove('active'); })
   tab.classList.add('active');

   setLinePosition();

   contents.forEach((content) => { content.classList.remove('active'); })
   contents[index].classList.add('active');
 });
});