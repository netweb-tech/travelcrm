<?php echo $__env->make('agent.includes.top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
        
.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
  background: #42b078;
}

.hovereffect .overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    padding: 0px 20px 50px;
}
.hovereffect img {
  display: block;
  position: relative;
  max-width: none;
  height:100%;
  width: calc(100% + 20px);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(-10px,0,0);
  transform: translate3d(-10px,0,0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.hovereffect:hover img {
  opacity: 0.4;
  filter: alpha(opacity=40);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

.hovereffect h2 {
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    background: #2f363c80 !IMPORTANT;
    position: relative;
    font-size: 17px;
    overflow: hidden;
    padding: 1em 0;
    background-color: transparent;
}
.hovereffect h2:after {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: #fff;
  content: '';
  -webkit-transition: -webkit-transform 0.35s;
  transition: transform 0.35s;
  -webkit-transform: translate3d(-100%,0,0);
  transform: translate3d(-100%,0,0);
}
.box .overlay {
    z-index: 50;
    background: rgba(255, 255, 255, 0.12);
    border-radius: 5px;
}
.hovereffect:hover h2:after {
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

.hovereffect a, .hovereffect p {
  color: #FFF;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(100%,0,0);
  transform: translate3d(100%,0,0);
}

.hovereffect:hover a, .hovereffect:hover p {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}
.hovereffect:hover h2{
  
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    position: relative;
    font-size: 17px;
    overflow: hidden;
    padding: 0.5em 0;
    background-color: transparent !important;

}
.hovereffect:hover .overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    padding: 120px 20px;
}
.hovereffect:hover a {
    background: #f9a825;
    padding: 10px;
    margin-top: 11px;
    display: inline-block;
    cursor: pointer;
    color:white;
}
</style>

<body class="hold-transition light-skin sidebar-mini theme-rosegold onlyheader">

<div class="wrapper">

<?php echo $__env->make('agent.includes.top-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content-wrapper">

    <div class="container-full clearfix position-relative">	

<?php echo $__env->make('agent.includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="content">



    <div class="content-header">

        <div class="d-flex align-items-center">

            <div class="mr-auto">

                <h3 class="page-title">Home</h3>

                <div class="d-inline-block align-items-center">

                    <nav>

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Home

                            </li>

                        </ol>

                    </nav>

                </div>

            </div>

           
        </div>

    </div>


    <div class="row">
      <div class="box">
          <div class="box-body">


            <div class="col-12">

                <div class="box">



                    <div class="box-body">
                <?php
                $service_type=session()->get('travel_agent_type');

                $services=explode(',',$service_type);
                ?>

                       <div class="row">
                        <?php if(in_array("hotel",$services)): ?>
                        <div class="col-sm-6 col-xs-12 mb-30" >
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e(asset('assets/images/agent/sunset-pool_1203-3192.jpg')); ?>" alt="hotels">
                                <div class="overlay">
                                    <h2>Hotels</h2>
                                    <p>
                                        <a href="<?php echo e(route('hotel-search')); ?>">CLICK HERE</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                         <?php if(in_array("activity",$services)): ?>
                        <div class="col-sm-6 col-xs-12 mb-30">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e(asset('assets/images/agent/skydiving-wallpapers-13.jpg')); ?>" alt="activity">
                                <div class="overlay">
                                    <h2>Activiy</h2>
                                    <p>
                                        <a href="<?php echo e(route('activity-search')); ?>">CLICK HERE</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                         <?php endif; ?>

                       <?php if(in_array("guide",$services)): ?>
                          <div class="col-sm-6 col-xs-12 mb-30">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e(asset('assets/images/agent/2019-11-28.png')); ?>" alt="guide">
                                <div class="overlay">
                                    <h2>Guide</h2>
                                    <p>
                                        <a href="<?php echo e(route('guide-search')); ?>">CLICK HERE</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                         <?php endif; ?>

                     <?php if(in_array("sightseeing",$services)): ?>
                        <div class="col-sm-6 col-xs-12 mb-30">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e(asset('assets/images/agent/climate-landscape-paradise-hotel-sunset_1203-5734.jpg')); ?>" alt="sightseeing">
                                <div class="overlay">
                                    <h2>SiteSeeing</h2>
                                    <p>
                                        <a href="<?php echo e(route('sightseeing-search')); ?>">CLICK HERE</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                         <?php endif; ?>
                        
                      
                      <!--   <div class="col-sm-6 col-xs-12 mb-30">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e(asset('assets/images/agent/travelling-background-design_1262-2532.jpg')); ?>" alt="itenerary">
                                <div class="overlay">
                                    <h2>Itenerary</h2>
                                    <p>
                                        <a href="#">CLICK HERE</a>
                                    </p>
                                </div>
                            </div>
                        </div> -->


                    </div>


                </div>
            </div>
        </div>

    </div>

</div>

</div>



<?php echo $__env->make('agent.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('agent.includes.bottom-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>
</html>
<?php /**PATH /home/tqfproco/crm.traveldoor.ge/resources/views/agent/home.blade.php ENDPATH**/ ?>