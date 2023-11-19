def reward_function(params):
    
    # Parámetros de entrada
    track_width = params['track_width']
    distance_from_center = params['distance_from_center']
    all_wheels_on_track = params['all_wheels_on_track']
    speed = params['speed']
    steering_angle = abs(params['steering_angle']) # Se toma el valor absoluto del ángulo de dirección
    progress = params['progress']
    steps = params['steps']

    # Parámetros de penalización y recompensa ult e2 e1
    collision_penalty = 1e-3    
    off_track_penalty = 1e-2
    speed_reward = 0.7
    steering_penalty = 0.3
    center_reward = 0.8
    progress_reward = 1

    # Penalizar si el coche se sale del circuito
    if not all_wheels_on_track:
        return off_track_penalty
    
    # Penalizar si hay colisión
    if params['is_crashed']:
        return collision_penalty
    
    # Penalizar cambios mayores de 15º en el ángulo de dirección ult. 18
    if steering_angle > 15: 
        return steering_penalty
    
    # Recompensar por mantenerse cerca de la línea central
    reward = center_reward * (1.0 - (distance_from_center / (0.3 * track_width)))
    
    # Recompensar la velocidad en secciones rectas ult >1
    if speed >= 1.5:
        reward += speed_reward
    
    # Recompensar por el progreso en la pista
    reward += progress_reward * progress / steps
    
    # Devolver la recompensa
    return float(reward)