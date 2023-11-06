def reward_function(params):
    '''
    Example of rewarding the agent to follow center line
    '''
    
    # Read input parameters
    track_width = params['track_width']
    distance_from_center = params['distance_from_center']
    
    # Calculate 3 markers that are at varying distances away from the center line
    marker_1 = 0.25 * track_width
    marker_2 = 0.5 * track_width
    marker_3 = 0.75 * track_width
    
    # Give higher reward if the car is closer to center line and vice versa
    if distance_from_center <= marker_1:
        reward = 1.0
    elif distance_from_center <= marker_2:
        reward = 0.6
    elif distance_from_center <= marker_3:
        reward = 0.1
    else:
        reward = 1e-3  # likely crashed/ close to off track
    
    return float(reward)



def reward_function(params):
    # Parámetros de entrada
    track_width = params['track_width']
    distance_from_center = params['distance_from_center']
    all_wheels_on_track = params['all_wheels_on_track']
    speed = params['speed']
    steering_angle = abs(params['steering_angle']) # Se toma el valor absoluto del ángulo de dirección
    progress = params['progress']
    steps = params['steps']

    # Parámetros de penalización y recompensa
    collision_penalty = 1e-3
    off_track_penalty = 1e-2
    speed_reward = 0.666
    steering_penalty = 0.333
    center_reward = 0.777
    progress_reward = 1.333

    # Penalizar si el coche se sale del circuito
    if not all_wheels_on_track:
        return off_track_penalty
    
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