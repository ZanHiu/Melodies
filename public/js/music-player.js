const audio = document.querySelector("audio");
const roll = document.getElementById("roller");
const play = document.getElementById("play");
const pl = document.getElementById("pl_id");
const pro = document.getElementById("pro");
const bar = document.getElementById("bar");
const shift = document.getElementById("shift");
const next = document.getElementById("next");
const back = document.getElementById("back");
const popup_container = document.querySelector(".popup-container")

const bar_width = pro.clientWidth;
var popup_cont = document.querySelector(".popup");

function pop() {
  popup_cont.classList.toggle("popup-flex");
  document.querySelector(".fa-chevron-down").style.cursor = "pointer";
}

function close_popup() {
  popup_cont.classList.remove("popup-flex");
}

audio.ontimeupdate = function () { update() };

const array_yaar = [{
  "name": "Mặc Vấn Quy Kỳ",
  "artist": "Tưởng Tuyết Nhi",
  "image": "imgs/tuong-tuyet-nhi.jpg",
  "path": "mac-van-quy-ky.mp3",
}, {
  "name": "Phi Điểu Và Ve Sầu",
  "artist": "Nhâm Nhiên",
  "image": "imgs/nham-nhien.jpg",
  "path": "phi-dieu-va-ve-sau.mp3",
}, {
  "name": "Dũng Khí",
  "artist": "Miên Tử",
  "image": "imgs/mien-tu.jpg",
  "path": "dung-khi.mp3",
}, {
  "name": "Đảo Không Người",
  "artist": "Nhâm Nhiên",
  "image": "imgs/nham-nhien.jpg",
  "path": "dao-khong-nguoi.mp3",
}, {
  "name": "Kỷ Niệm",
  "artist": "Lôi Vũ Tâm",
  "image": "imgs/loi-vu-tam.jpg",
  "path": "ky-niem.mp3",
}];

songIndex = 0;
text = "";

for (let i = 0; i < array_yaar.length; i++) {
  text += "<p class='f" + i + "'>" + array_yaar[i].name + "</p>";
  document.querySelector(".popup-container").innerHTML = text;
  const x = ".popup-container .f" + i;
  const v = document.querySelector(x);
}

const nextSong = () => {
  songIndex = (songIndex + 1) % array_yaar.length;
  audio.src = 'audio/' + array_yaar[songIndex].path;
  isplay = true;
  document.querySelector(".song_name").innerHTML = array_yaar[songIndex].name;
  document.querySelector(".artist").innerHTML = array_yaar[songIndex].artist;
  document.getElementById("image_").src = array_yaar[songIndex].image;
  audio.play();
  pl.classList.replace("fa-play", "fa-pause");
}

const prevSong = () => {
  songIndex = (songIndex - 1 + array_yaar.length) % array_yaar.length;
  audio.src = 'audio/' + array_yaar[songIndex].path;
  isplay = true;
  document.querySelector(".song_name").innerHTML = array_yaar[songIndex].name;
  document.querySelector(".artist").innerHTML = array_yaar[songIndex].artist;
  document.getElementById("image_").src = array_yaar[songIndex].image;
  audio.play();
  pl.classList.replace("fa-play", "fa-pause");
}

next.addEventListener('click', nextSong);
back.addEventListener('click', prevSong);

let isplay = false;

const playaud = () => {
  isplay = true;
  audio.play();
}
const pauseaud = () => {
  isplay = false;
  audio.pause();
}

play.addEventListener('click', () => {
  if (isplay) {
    pauseaud();
    pl.classList.replace("fa-pause", "fa-play");
    roll.style.animationPlayState = 'paused';
  } else {
    playaud();
    pl.classList.replace("fa-play", "fa-pause");
    roll.classList.add('anime');
    roll.style.animationPlayState = 'running';
  }
})

function update() {
  let player = audio.currentTime;
  // console.log(dur);

  let dur = audio.duration;
  const dur_min = dur / 60;
  // console.log(dur_min);
  const dur_sec = dur % 60;
  // console.log(dur_sec);
  const t_min = player / 60;
  const t_sec = player % 60;

  const per_sec = (player / dur) * 100;
  bar.style.width = per_sec + "%";

  pro.addEventListener('click', (event) => {
    // console.log(event);
    // console.log(pro.clientWidth);
    const tota = event.offsetX;
    // console.log(tota);
    const move = (tota / pro.clientWidth) * 100;
    bar.style.width = move + "%";
    audio.currentTime = (move / 100) * dur;
  })



  if (audio.duration === audio.currentTime) {
    // console.log("hey");
    nextSong();
  }

  if (t_min < 1) {
    if (t_sec < 10) {
      document.getElementById("start").innerHTML = '0'.concat(':', '0', Math.floor(t_sec));
    } else {
      document.getElementById("start").innerHTML = '0'.concat(':', Math.floor(t_sec));
    }
  } else {
    if (t_sec < 10) {
      document.getElementById("start").innerHTML = Math.floor(t_min) + ':0' + Math.floor(t_sec);
    } else {
      document.getElementById("start").innerHTML = Math.floor(t_min) + ':' + Math.floor(t_sec);
    }
  }
  if (dur_min < 1) {
    if (dur_sec < 10) {
      document.getElementById("end").innerHTML = '0'.concat(':', '0', Math.floor(dur_sec));
    } else {
      document.getElementById("end").innerHTML = '0'.concat(':', Math.floor(dur_sec));
    }
  } else {
    if (dur_min == 0) {
      if (dur_sec < 10) {
        document.getElementById("end").innerHTML = '0'.concat(':', '0', Math.floor(dur_sec));
      } else {
        document.getElementById("end").innerHTML = '0'.concat(':', Math.floor(dur_sec));
      }
    } else {
      if (dur_sec < 10) {
        document.getElementById("end").innerHTML = Math.floor(dur_min) + ':0' + Math.floor(dur_sec);
      } else {
        document.getElementById("end").innerHTML = Math.floor(dur_min) + ':' + Math.floor(dur_sec);
      }
    }
  }
}