import math;
import random;
import numpy;
import scipy;
import shapely;

def reward_function(params):
    # Parámetros de entrada
    track_width = params['track_width']
    distance_from_center = params['distance_from_center']
    all_wheels_on_track = params['all_wheels_on_track']
    speed = params['speed']
    steering_angle = abs(params['steering_angle']) # Se toma el valor absoluto del ángulo de dirección
    progress = params['progress']
    steps = params['steps']
    waypoints = params['waypoints']
    closest_waypoints = params['closest_waypoints']
    heading = params['heading']

    # Parámetros de penalización y recompensa
    reward=0.666
    collision_penalty = 1e-3
    off_track_penalty = 1e-2
    speed_reward = 0.666
    steering_penalty = 0.333
    center_reward = 0.777
    progress_reward = 1.333

    # Penalizar si el coche se sale del circuito
    if not all_wheels_on_track:
        return off_track_penalty
    
    # Calculate the direction of the center line based on the closest waypoints
    next_point = waypoints[closest_waypoints[1]]
    prev_point = waypoints[closest_waypoints[0]]

    # Calculate the direction in radius, arctan2(dy, dx), the result is (-pi, pi) in radians
    track_direction = math.atan2(next_point[1] - prev_point[1], next_point[0] - prev_point[0])
    # Convert to degree
    track_direction = math.degrees(track_direction)

    # Calculate the difference between the track direction and the heading direction of the car
    direction_diff = abs(track_direction - heading)
    if direction_diff > 180:
        direction_diff = 360 - direction_diff

    # Penalize the reward if the difference is too large
    DIRECTION_THRESHOLD = 10.0
    if direction_diff > DIRECTION_THRESHOLD:
        reward *= 0.3
    
    # Penalizar si hay colisión
    if params['is_crashed']:
        return collision_penalty
    
    # Penalizar cambios bruscos en el ángulo de dirección
    if steering_angle > 15:
        return steering_penalty
    
    # Recompensar por mantenerse cerca de la línea central
    reward = center_reward * (1.0 - (distance_from_center / (0.333 * track_width)))
    
    # Recompensar la velocidad en secciones rectas
    if speed >= 3:
        reward += speed_reward
    
    # Recompensar por el progreso en la pista
    reward += progress_reward * progress / steps
    
    return float(reward)