// import Jerboa from './Componentes/test';

import Login from './Screens/Login';
import Home from './Screens/Home';    
import Fale from './Screens/Fale';
import Produtos from './Screens/Produtos';
import Count from './Screens/Contador';
             
import AntDesign from '@expo/vector-icons/AntDesign';
import 'react-native-gesture-handler';

import { NavigationContainer } from '@react-navigation/native';
import { createDrawerNavigator } from '@react-navigation/drawer';
import { createStackNavigator } from '@react-navigation/stack';

function DrawerNavigation(){
  const drawer = createDrawerNavigator();
  return (
    <drawer.Navigator>
      <drawer.Screen name='Home' component={Home}></drawer.Screen>
      <drawer.Screen name='Fale Conosco' component={Fale}></drawer.Screen>
      <drawer.Screen name='Produtos' component={Produtos}></drawer.Screen>
      <drawer.Screen name='Contador' component={Count}></drawer.Screen>
    </drawer.Navigator>
  )
}

export default function Stack() {

  const Stack = createStackNavigator();

  return ( 
    <NavigationContainer>
      <Stack.Navigator initialRouteName='Login' screenOptions={{headerShown:false}}>   
        <Stack.Screen name="Login" component={Login} /> 
        <Stack.Screen name="DrawerNavigation" component={DrawerNavigation} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}

