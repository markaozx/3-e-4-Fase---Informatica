import {View, Text, StyleSheet, Button, TouchableOpacity} from 'react-native';
import {useState} from 'react';

export default function Count() {
    const [count, setCount] = useState(0);

    function Aumentar() {
        setCount(count + 1);
    }
    function Diminuir() {
        setCount(count - 1);
    }

    return (
        <View style={styles.container}>
            <Text style={styles.countText}>Contador: {count}</Text>
            <View style={styles.buttonContainer}>
                <TouchableOpacity style={styles.button} onPress={Aumentar}>
                    <Text style={styles.buttonText}>Aumentar</Text>
                </TouchableOpacity>
                <TouchableOpacity style={styles.button} onPress={Diminuir}>
                    <Text style={styles.buttonText}>Diminuir</Text>
                </TouchableOpacity>
            </View>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: '#f0f0f0',
    },
    countText: {
        fontSize: 32,
        marginBottom: 20,
        fontWeight: 'bold',
    },
    buttonContainer: {
        flexDirection: 'row',
        justifyContent: 'space-between',
        width: '60%',
    },
    button: {
        backgroundColor: '#007AFF',
        paddingVertical: 10,
        paddingHorizontal: 20,
        borderRadius: 8,
    },
    buttonText: {
        color: '#fff',
        fontSize: 18,
    },
});
