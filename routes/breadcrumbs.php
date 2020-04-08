<?php
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('customer', function ($trail) {
    $trail->push('Customer', route('customer.index'));
});

Breadcrumbs::for('customer.create', function ($trail) {
    $trail->parent('customer');
    $trail->push('Create', route('customer.create'));
});

Breadcrumbs::for('customer.edit', function ($trail, $customer) {
    $trail->parent('customer');
    $trail->push('Edit', route('customer.edit', $customer));
});

Breadcrumbs::for('employee', function ($trail) {
    $trail->push('Employee', route('employee.index'));
});

Breadcrumbs::for('employee.create', function ($trail) {
    $trail->parent('employee');
    $trail->push('Create', route('employee.create'));
});

Breadcrumbs::for('employee.edit', function ($trail, $employee) {
    $trail->parent('employee');
    $trail->push('Edit', route('employee.edit', $employee));
});


Breadcrumbs::for('service', function ($trail) {
    $trail->push('Service', route('service.index'));
});

Breadcrumbs::for('service.create', function ($trail) {
    $trail->parent('service');
    $trail->push('Create', route('service.create'));
});

Breadcrumbs::for('service.edit', function ($trail, $service) {
    $trail->parent('service');
    $trail->push('Edit', route('service.edit', $service));
});
