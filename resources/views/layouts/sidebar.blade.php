<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 250px; height: 100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <span class="fs-5 fw-bold">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.*') ? 'active' : 'text-dark' }}">
                👥 Employees
            </a>
        </li>
        <li>
            <a href="{{ route('workflow-approvals.index') }}" class="nav-link {{ request()->routeIs('workflow-approvals.*') ? 'active' : 'text-dark' }}">
                ✅ Workflow Approvals
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('transactions.index') }}" class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : 'text-dark' }}">
                📑 Transactions
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('need-approvals.index') }}" class="nav-link {{ request()->routeIs('need-approvals.*') ? 'active' : 'text-dark' }}">
                ⏳ Need Approvals
            </a>
        </li>
    </ul>
</div>
