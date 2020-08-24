const video = document.getElementById('video');

const faceDectectCount    = {success: 0 , fail:0};
var   twentyMinutes       = 0;


Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('/202020/models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('/202020/models'),
  faceapi.nets.faceRecognitionNet.loadFromUri('/202020/models'),
  faceapi.nets.faceExpressionNet.loadFromUri('/202020/models')
]).then(startVideo);

function startVideo() {

    navigator.getUserMedia(
        { video: {} },
        stream => video.srcObject = stream,
        err    => console.error(err)
    );

    startTimeTracing();
}

video.addEventListener('play', () => {

  const canvas = faceapi.createCanvasFromMedia(video);
  document.body.append(canvas);

  const displaySize = { width: video.width, height: video.height };

  faceapi.matchDimensions(canvas, displaySize);

  setInterval(async () => {

    const detections        = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions();
    const resizedDetections = faceapi.resizeResults(detections, displaySize);

    if(detections.length > 0) {

        faceDectectCount['success'] += 1;
    }else{

        faceDectectCount['fail']    += 1;
    }
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
    faceapi.draw.drawDetections(canvas, resizedDetections);
    //faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);
    //faceapi.draw.drawFaceExpressions(canvas, resizedDetections);

  }, 100);

});


function startTimeTracing() {

    setTimeout(function() {

      if( twentyMinutes === notifyTime) {
          showNotify();
          setInterval(async () => {
              startAgain();
          }, 20000);
      }
      else if( faceDectectCount['success']  > faceDectectCount['fail'] ) {

          console.log(faceDectectCount);
          faceDectectCount['success']  = 0 ;
          faceDectectCount['fail']     = 0 ;
          startTimeTracing();

      }else{

          startAgain();
      }

    }, 1000*60 );

    twentyMinutes   +=  1;

}

function startAgain() {

    twentyMinutes                = 0 ;
    faceDectectCount['success']  = 0 ;
    faceDectectCount['fail']     = 0 ;
    startTimeTracing();
}

function showNotify() {


    if(notifyType == 'Audio' || notifyType == 'Both') {

        document.getElementById("myAudio").play();
    }

    if(notifyType == 'Push notification' || notifyType== 'Both') {

        Push.create("Please look 20 seconds outside!", {
            body: "Please look 20 seconds outside",
            timeout: 20000,
            onClick: function () {
                window.focus();
                this.close();
            }
        });
    }

}
