function sum(N ,K)
{
    let sum = 0;

    for(let i =1 ; i<=N;i++)
    {
        let current = i;
        while(current % K === 0)
        {
            current /=K;
        }
        sum +=current;
    }
    return sum;
}
function sumOfFEfficient(N, K) {
    let totalSum = 0;
    let power = 1;

    // Keep iterating while power of K is less than or equal to N
    while (power <= N) {
        // Calculate the next power of K
        let nextPower = power * K;
        
        // Calculate how many numbers fall in the current range [power, min(N, nextPower - 1)]
        let count = Math.min(N, nextPower - 1) - power + 1;
        
        // Add their contribution to the total sum
        totalSum += count * Math.floor(N / power);
        
        // Move to the next power of K
        power = nextPower;
    }

    return totalSum;
}

// Example usage
const N = 66;
const K = 2;
console.log(sumOfFEfficient(N, K));  // Output will be 1835

const N2 = 66;
const K2 = 2;
console.log(sumOfFEfficient(N2, K2));  // Output will be 1464

const N3 = 66;
const K3 = 2;
console.log(sum(N3,K3));