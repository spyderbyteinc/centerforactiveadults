<?php
include "header.php";
include "connect.php";

?>
<style>
    body {
  font-size: 13px;
  background-color: #fbfbfb;
  font-family: "Raleway";
  line-height: 1.4;
  opacity: 1;
  color: #3E3E40;
  transition: 1s opacity;
  letter-spacing: 0.5px;
}

a,
a:focus,
button,
button:focus {
  outline: none;
}

.main-sec {
  padding-top: 60px;
}

.title-head {
  text-align: center;
  color: #616061;
  position: relative;
  margin: 30px 0 2px;
  padding-top: 12px;
  font-size: 22px;
}
.title-head:before {
  content: "";
  width: 96px;
  height: 2px;
  background: #e8488e;
  position: absolute;
  bottom: 0;
  left: 50%;
  margin: 0 auto;
  transform: translate(-50%, -43%);
  z-index: -1;
}

.drag {
  position: relative;
  min-height: 300px;
  margin: 40px;
}
.drag .wrapper {
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  display: flex;
  flex: 1 1 0;
  justify-content: space-around;
  color: #BBB;
}
.drag .wrapper ul {
  width: 40%;
  min-height: 300px;
  padding: 18px;
  list-style-type: none;
  background-color: rgba(0, 0, 0, 0.2);
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
.drag .wrapper ul li {
  padding: 5% 2%;
  background-color: #fff;
  text-align: center;
  transition: 0.3s ease-out;
  margin-bottom: 15px;
  width: calc(100%/2 - 30px);
  float: left;
  margin: 15px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  border-radius: 3px;
  cursor: move;
}
.drag .wrapper ul li:hover {
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}
.drag .wrapper ul li p {
  margin-bottom: 0;
  font-size: 24px;
}
.drag .wrapper ul li:active {
  background-color: #ed328f;
  color: white;
}

footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #a0a0a0;
  color: white;
  text-align: center;
  padding: 13px;
}
footer p {
  margin: 0;
}
</style>
<!--   header section -->
  <header>
    <nav class="container navbar navbar-expand-lg navbar-light fixed-top bg-light">
      <a class="navbar-brand" href="#">Logo here</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item ">
            <a class="nav-link" href="#">Antu</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Faqs</a>
          </li>
        </ul>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    </nav>
  </header>
<!--   header section -->

<!-- main content -->
    <section class="main-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="title-head">DRAG & DROP</h2>
        <div class="drag">
          <div class="wrapper">
            <ul class="dropzone">
              <li draggable="true">
                <p>1</p>
              </li>
              <li draggable="true">
                <p>2</p>
              </li>
              <li draggable="true">
                <p>3</p>
              </li>
              <li draggable="true">
                <p>4</p>
              </li>
              <li draggable="true">
                <p>5</p>
              </li>
              <div style="clear:both"></div>
            </ul>
            <ul class="dropzone"></ul>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- main content -->
<footer>
   <p>Footer</p>
</footer>
<script>
   $( function() {
    $( ".dropzone" ).sortable();
  } );
      (function() {
      var dragged, listener;

      console.clear();

      dragged = null;

      listener = document.addEventListener;

      listener("dragstart", (event) => {
        console.log("start !");
        return dragged = event.target;
      });

      listener("dragend", (event) => {
        return console.log("end !");
      });

      listener("dragover", function(event) {
        return event.preventDefault();
      });

      listener("drop", (event) => {
        console.log("drop !");
        event.preventDefault();
        if (event.target.className === "dropzone") {
          dragged.parentNode.removeChild(dragged);
          return event.target.appendChild(dragged);
        }
      });

    }).sortable({
    revert: false
});
</script>
