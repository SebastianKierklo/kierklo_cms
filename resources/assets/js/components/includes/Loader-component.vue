<template>
    <div>
        <transition name="fade" mode="out-in">
            <div class="container-2" v-if="loading">
                <div class="circle-container">
                    <div class="circle circle-1"></div>
                    <div class="circle circle-2"></div>
                    <div class="circle circle-3"></div>
                    <div class="circle circle-4"></div>
                </div>
                <p class="message-parag">{{message}}</p>
            </div>
        </transition>
    </div>
</template>
<script>
export default {
    props: {
        message: String,
        loading: Boolean
    }
}
</script>
<style lang="scss" scoped>
.container-2 {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 300px;
}
.circle-container {
  display: flex;
  width: 50px;
  flex-wrap: wrap;
}
.message-parag{
    margin-top: 40px;
    font-weight: 500;
    text-transform: uppercase;
}
.circle {
  position: relative;
  width: calc(25px);
  height: calc(25px);
  opacity: 0;
}
.circle::before {
  content: '';
  position: absolute;
  width: 20px;
  height: 20px;
  border-radius: 50%;
}
.circle-1 {
  -webkit-animation: animate-circle 2s ease-in-out infinite;
          animation: animate-circle 2s ease-in-out infinite;
}
.circle-1::before {
  background: #ffdd4a;
  bottom: calc(-10px);
  right: calc(-10px);
}
.circle-2 {
  -webkit-animation: animate-circle 2s ease-in-out infinite;
          animation: animate-circle 2s ease-in-out infinite;
}
.circle-2::before {
  background: #59bb5d;
  bottom: calc(-10px);
  left: calc(-10px);
}
.circle-3 {
  -webkit-animation: animate-circle 2s ease-in-out infinite;
          animation: animate-circle 2s ease-in-out infinite;
}
.circle-3::before {
  background: #bb3c3c;
  top: calc(-10px);
  right: calc(-10px);
}
.circle-4 {
  -webkit-animation: animate-circle 2s ease-in-out infinite;
          animation: animate-circle 2s ease-in-out infinite;
}
.circle-4::before {
  background: #3e9fec;
  top: calc(-10px);
  left: calc(-10px);
}
@-webkit-keyframes animate-circle {
  0% {
    -webkit-transform: rotate(0);
            transform: rotate(0);
  }
  25% {
    opacity: 1;
  }
  75% {
    opacity: 1;
  }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
    opacity: 0;
  }
}
@keyframes animate-circle {
  0% {
    -webkit-transform: rotate(0);
            transform: rotate(0);
  }
  25% {
    opacity: 1;
  }
  75% {
    opacity: 1;
  }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
    opacity: 0;
  }
}

</style>
