package com.nito.example.rest.Repo;

import org.springframework.data.jpa.repository.JpaRepository;

import com.nito.example.rest.Models.User;

/**
 * UserRepo
 */
public interface UserRepo extends JpaRepository<User, Long> {

    
}