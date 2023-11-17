<header class="navbar navbar-expand-lg bg-body-tertiary py-3 mb-4 border-bottom">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        </svg>
        <span class="fs-3 fw-bold badge bg-primary text-wrap" style="width: 15rem;">AutoMobile
            
        </span>
    </a>

    <ul class="nav nav-pills">
        @php
            $menu = [
            ['url' => '/',               'name' => 'Home'], 
            ['url' => 'sparepart',       'name' => 'Sparepart'], 
            ['url' => 'ban',              'name' => 'Ban']];
        @endphp

        @foreach ($menu as $m)
            @include('layout.nav-item', ['menu' => $m])
        @endforeach
    </ul>
</header>