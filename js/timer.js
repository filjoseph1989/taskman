/**
 * This file change the label of the button for clock timer
 * If click, display resume
 * If click again display pause
 */
$(document).ready(function() {
  var Clock = {
    totalSeconds: 800,
    start: function () {
      var self = this;
      this.interval = setInterval(function () {
          self.totalSeconds -= 1;
          $("#hour").text(Math.floor(self.totalSeconds / 3600));
          $("#min").text(Math.floor(self.totalSeconds / 60 % 60));
          $("#sec").text(parseInt(self.totalSeconds % 60));
      }, 1000);
    },
    pause: function () {
      clearInterval(this.interval);
      delete this.interval;
    },
    resume: function () {
      if (!this.interval) this.start();
    }
  };
  Clock.start();
  $('.pauseResume').click(function () {
    if ($(this).is(":checked")) {
      Clock.pause();
      $(this).next('label').text("Resume");
    } else {
      Clock.resume();
      $(this).next('label').text("Pause");
    }
  });
  // $('#pauseResume').button();
  // $('#pauseResume').next('label').text("Pause");
});
