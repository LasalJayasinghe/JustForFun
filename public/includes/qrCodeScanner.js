//var qrcode = window.qrcode;

const video = document.createElement("video");
const canvasElement = document.getElementById("qr-canvas");
const canvas = canvasElement.getContext("2d");

// const qrResult = document.getElementById("qr-result");
const outputData = document.getElementById("outputData");
const btnScanQR = document.getElementById("btn-scan-qr");
const btnScanQRcont = document.getElementById("btn-scan-qr-cont");
const scanimg = document.getElementById("scanimg");
const scanres = document.getElementById("scanres");
const vidinput = document.getElementById("vehicleno");
let scanning = false;

qrcode.callback = res => {
  if (res) {
    scanimg.hidden = true;
    scanres.hidden = false;
    scanres.innerHTML = res;
    btnScanQR.style = 'height:200px';
    vidinput.value = res; //takes in the input scanned from the qr code and puts it in the input field

    document.querySelector('form').submit();
    
    scanning = false;

    video.srcObject.getTracks().forEach(track => {
      track.stop();
    });

    // qrResult.hidden = false;
    canvasElement.hidden = true;
    btnScanQR.hidden = false;
  }
};

btnScanQR.onclick = () => {
  navigator.mediaDevices
    .getUserMedia({ video: { facingMode: "environment" } })
    .then(function(stream) {
      scanning = true;
      canvasElement.hidden = false;
      btnScanQR.style = 'height:0px';
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.srcObject = stream;
      video.play();
      tick();
      scan();
    });
};

function tick() {
  canvasElement.height = video.videoHeight;
  canvasElement.width = video.videoWidth;
  canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

  scanning && requestAnimationFrame(tick);
}

function scan() {
  try {
    qrcode.decode();
  } catch (e) {
    setTimeout(scan, 300);
  }
}