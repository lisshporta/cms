<?php

test('it can render the home page', function () {
    $this->get("/")->assertStatus(200);
});
