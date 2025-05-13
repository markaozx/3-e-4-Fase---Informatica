import {View, Text, Image, StyleSheet, TextInput, Button, ImageBackground} from 'react-native';
import { createUserWithEmailAndPassword } from 'firebase/auth';
import { auth } from '../controller';
import {useState} from 'react';

export default function Cadastro({navigation}) {

    const [email, setEmail] = useState("");
    const [senha, setSenha] = useState("");

    const RegistroUsuario = () => {
        createUserWithEmailAndPassword(auth, email, senha)
            .then((userCredential) => {
                // Signed up 
                console.log('usuario cadastrado', userCredential.user.email);
                navigation.navigate('Login');
                
            })
            .catch((error) => {
                console.log('erro', error.message);
              
            });

    }
  return(
    <ImageBackground source={{uri: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6hKeZf7ni18SykGsxdkyYJ1X4MdlCZwbf9Q&s'}} style= {{width: '100%', height: '100%'}}>
    <View>
      <Text>Cadastro de Usuario</Text>
      <View>
          <Text>Email: </Text>
          <TextInput
            placeholder='email'
            value={email}
            onChangeText={setEmail}
          />
      </View>
      <View>
          <Text>Senha: </Text>
          <TextInput
            placeholder='senha'
            value={senha}
            onChangeText={setSenha}
          />
      </View>
      <View>
      <Button title="Cadastrar" color='black' onPress={RegistroUsuario}/>
      </View>
      <View>
      <Text>Direitos autorais Liberty Walk ©
      2025</Text>
      </View>
    </View>
    </ImageBackground>
    )
}

