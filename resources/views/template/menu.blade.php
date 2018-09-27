
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active"><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{Route('siswa.index')}}"><i class="fa fa-user"></i> Siswa</a></li>
      <li><a href="{{Route('kelas.index')}}"><i class="fa fa-table"></i> Kelas</a></li>
      <li><a href="{{Route('mata_pelajaran.index')}}"><i class="fa fa-list-alt"></i> Mata pelajaran</a></li>
      <li><a href="{{Route('absen.index')}}"><i class="fa fa-line-chart"></i>Absen</a></li>
      <li><a href="{{Route('piket.index')}}"><i class="fa fa-file-powerpoint-o"></i>Piket</a></li>
    </ul>
  </section>
