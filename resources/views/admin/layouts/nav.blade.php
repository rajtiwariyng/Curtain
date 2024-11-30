<div class="topBar">
  <div class="topbarLeft">
      <h6 class="m-0 fw-bold">Welcome, {{ Auth::user()->name }}</h6>
      <p class="m-0 small">Today is {{ \Carbon\Carbon::now()->format('l, jS F Y') }}.</p>
  </div>
  <div class="topbarRight">
      <div class="dropdown">
          <div class="d-flex align-items-center justify-content-center" type="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <div class="d-flex align-items-center justify-content-start">
                  <i class="bi bi-person-circle me-2" style="font-size: 32px; line-height: 0;"></i>
                  <div>
                      <p class="m-0 fw-bold" style="line-height: normal;">{{ Auth::user()->name }}</p>
                      <p class="m-0 small" style="line-height: normal;">{{ Auth::user()->getRoleNames()[0] }}</p>
                  </div>
              </div>
              <i class="bi bi-chevron-down ms-3"></i>
          </div>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                          class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
          </ul>
      </div>
  </div>
</div>