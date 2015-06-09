<?php

Route::group(['prefix'=>'admin'], function() {
    get('/', ['as'=>'admin.home', 'uses'=>'Backend\ManageUserController@all']);
    get('users', ['as' => 'admin.user.all', 'uses' => 'Backend\ManageUserController@all']);
    get('user/@{username}/editor', ['as' => 'admin.user.editor', 'uses' => 'Backend\ManageUserController@edit']);
    put('user/update', ['as' => 'admin.user.update', 'uses' => 'Backend\ManageUserController@update']);
    get('groups', ['as' => 'admin.group.all', 'uses' => 'Backend\GroupController@all']);
    put('group/{id}/update', ['as' => 'admin.group.update', 'uses' => 'Backend\GroupController@update']);
    post('group/store', ['as' => 'admin.group.store', 'uses' => 'Backend\GroupController@store']);
    delete('group/delete/{id}', ['as' => 'admin.group.delete', 'uses' => 'Backend\GroupController@delete']);
});