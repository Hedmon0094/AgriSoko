<?php

Schema::create('loans', function (Blueprint $table) {
    $table->id();
    $table->string('phone_number');
    $table->decimal('amount', 10, 2);
    $table->string('status')->default('pending');
    $table->timestamps();
});
